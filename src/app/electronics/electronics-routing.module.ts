import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { AboutelectronicsComponent } from './aboutelectronics/aboutelectronics.component';
import { HomeelectronicsComponent } from './homeelectronics/homeelectronics.component';

const routes: Routes = [
  {path:"",component:HomeelectronicsComponent},
  {path:"item/:id/:describ/:price/:user_item_id",component:AboutelectronicsComponent}
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule]
})
export class ElectronicsRoutingModule { }
