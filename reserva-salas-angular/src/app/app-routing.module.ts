import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { ReservaListaComponent} from "./components/reserva-lista/reserva-lista.component";

const routes: Routes = [
  { path: '', redirectTo: '/reservas', pathMatch: 'full' }, // redireciona a rota inicial para /reservas
  { path: 'reservas', component: ReservaListaComponent }
];


@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
