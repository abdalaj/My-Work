import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { AboutshoesComponent } from './aboutshoes/aboutshoes.component';
import { HomeshoesComponent } from './homeshoes/homeshoes.component';

const routes: Routes = [
  {path:"",component:HomeshoesComponent},
  {path:"item/:id/:describ/:price/:user_item_id",component:AboutshoesComponent}
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule]
})
export class ShoesRoutingModule { }
