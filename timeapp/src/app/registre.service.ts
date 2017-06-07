import { Injectable } from '@angular/core';
import { Http, Headers, RequestOptions } from '@angular/http';

import 'rxjs/add/operator/toPromise';

import { Registre } from './registre';

@Injectable()
export class RegistreService {

    private actionUrl = 'http://localhost:8888/time/timeapi/registres.php';
    private actionUrl2 = 'http://localhost:8888/time/timeapi/accions.php';

    constructor(private http: Http){ }

    getRegistres(): Promise<any> {
        return this.http.get(this.actionUrl2+"?registres")
            .toPromise()
            .then(response => response.json().data as Registre[])
            .catch(this.handleError);
    }

    deleteRegistre(idRegistre): Promise<any> {
        return this.http.delete(this.actionUrl2+"?id="+idRegistre)
            .toPromise()
            .then(response => console.log(response))
            .catch(this.handleError);
    }

    updateRegistre(reg): Promise<any> {
        let headers = new Headers({ 'Content-Type': 'application/json' });
        let options = new RequestOptions({ headers: headers });

        return this.http.post(this.actionUrl2, {reg}, options)
                .toPromise()
                .then(response => console.log(response))
                .catch(this.handleError);
    }

    private handleError(error: any): Promise<any> {
      console.error('An error occurred', error); // for demo purposes only
      return Promise.reject(error.message || error);
    }
}