import { Component, OnInit } from '@angular/core';
import { Hero } from '../hero';
import { Registre } from '../registre';
import { HeroService } from '../hero.service';
import { RegistreService } from '../registre.service';


@Component({
  selector: 'my-heroes',
  templateUrl: './heroes.component.html',
  styleUrls: ['./heroes.component.css']
})

export class HeroesComponent implements OnInit {
  heroes: Hero[];
  selectedHero: Hero;
  registres: Registre[];
  constructor(
    //private router: Router,
    private heroService: HeroService,
    private regService: RegistreService) { }

  getHeroes(): void {
    this.heroService.getHeroes().then(heroes => this.heroes = heroes);
  }

  getRegistres(): void {
    this.regService.getRegistres().then(registres => this.registres = registres);
  }

  delRegistre(idReg, reg): void {
    let confirma = confirm("Estas segur de voler eliminar?");
    if (confirma) {
      //this.regService.deleteRegistre(idReg);
      this.registres[this.registres.indexOf(reg)] = undefined;
    } else {
      this.regService.updateRegistre(reg);
    }
  }

  ngOnInit(): void {
    this.getHeroes();
    this.getRegistres();
  }

  onSelect(hero: Hero): void {
    this.selectedHero = hero;
  }

  gotoDetail(): void {
    //this.router.navigate(['/detail', this.selectedHero.id]);
  }
}
