import { Injectable } from '@angular/core';
import { Http, Headers } from '@angular/http';

import 'rxjs/add/operator/toPromise';

import { Registre } from './registre';

@Injectable()
export class RegistreService {

    private actionUrl = 'http://localhost:8888/time/timeapi/registres.php';

    constructor(private http: Http){ }

    getRegistres(): Promise<any> {
        return this.http.get(this.actionUrl)
            .toPromise()
            .then(response => response.json().data as Registre[])
            .catch(this.handleError);
    }

    private handleError(error: any): Promise<any> {
      console.error('An error occurred', error); // for demo purposes only
      return Promise.reject(error.message || error);
    }
}