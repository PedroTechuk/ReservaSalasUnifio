import { Injectable } from '@angular/core';
import {HttpClient} from "@angular/common/http";
import {Observable} from "rxjs";
import {Reserva} from "../models/reserva.model";

@Injectable({
  providedIn: 'root'
})
export class ReservaService {
  private readonly API_URL = 'http://127.0.0.1:8000/api';

  constructor(
    private http: HttpClient
  ) { }

  getReservas(): Observable<Reserva[]>{
    return this.http.get<Reserva[]>(`${this.API_URL}/reservas`)
  }
  getReserva(sala_id: number): Observable<Reserva>{
    return this.http.get<Reserva>(`${this.API_URL}/reservas/${sala_id}`);
  }

  createReserva(data:Reserva): Observable<Reserva>{
    return this.http.post<Reserva>(`${this.API_URL}/reservas`, data);
  }

  updateReserva(id: number, data: Reserva): Observable<Reserva>{
    return this.http.put<Reserva>(`${this.API_URL}/reservas/${id}`, data);
  }

  deleteReserva(id: number): Observable<any>{
    return this.http.delete<any>(`${this.API_URL}/reservas/${id}`)
  }
}
