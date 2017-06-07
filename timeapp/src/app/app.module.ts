import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import { FormsModule } from '@angular/forms';
import { HttpModule } from '@angular/http';

import { AppComponent } from './app.component';
<<<<<<< HEAD
=======
import { HeroesComponent } from './heroes/heroes.component';
import { HeroDetailComponent } from './hero-detail/hero-detail.component';
import { HeroService } from './hero.service';
import { RegistreService } from './registre.service';
import { DashboardComponent } from './dashboard/dashboard.component';
import { AppRoutingModule } from './app-routing.module';
>>>>>>> bf3d0f9e860998c75789b4ad21610bf1541afc17

@NgModule({
  declarations: [
    AppComponent
  ],
  imports: [
    BrowserModule,
    FormsModule,
<<<<<<< HEAD
    HttpModule
=======
    HttpModule,
    AppRoutingModule
  ],
  providers: [HeroService, RegistreService],
  declarations: [
  	AppComponent, 
  	HeroDetailComponent, 
  	HeroesComponent, 
  	DashboardComponent
>>>>>>> bf3d0f9e860998c75789b4ad21610bf1541afc17
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
