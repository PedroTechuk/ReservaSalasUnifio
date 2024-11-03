import {Component, OnInit} from '@angular/core';
import {Reserva} from 'src/app/models/reserva.model'
import {ReservaService} from "../../services/reserva.service";

@Component({
  selector: 'app-reserva-lista',
  templateUrl: './reserva-lista.component.html',
  styleUrls: ['./reserva-lista.component.scss']
})
export class ReservaListaComponent implements OnInit{
  reservas: Reserva[] = [];

  constructor(
    private reservaService: ReservaService
  ) {}

  ngOnInit(): void{
    this.reservaService.getReservas().subscribe(
      (dados: Reserva[])=>{
        this.reservas = dados;
      }
    );
  }

  private loadDataIntoTable(): void {
    this.reservaService.getReservas().subscribe(reservas => {
        this.reservas = reservas;
      },
      error => {
        console.error('Erro ao buscar reservas:', error)
      })
  }
}
