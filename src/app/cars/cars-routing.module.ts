import { AboutcarsComponent } from './aboutcars/aboutcars.component';
import { HomecarsComponent } from './homecars/homecars.component';
import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';

const routes: Routes = [
  {path:"",component:HomecarsComponent},
  {path:"item/:id/:describ/:price/:user_item_id",component:AboutcarsComponent}
];
@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule]
})
export class CarsRoutingModule { }
