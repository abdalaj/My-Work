import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { AboutclothesComponent } from './aboutclothes/aboutclothes.component';
import { HomeclothesComponent } from './homeclothes/homeclothes.component';

const routes: Routes = [
  {path:"",component:HomeclothesComponent},
  {path:"item/:id/:describ/:price/:user_item_id",component:AboutclothesComponent}
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule]
})
export class ClothesRoutingModule { }
