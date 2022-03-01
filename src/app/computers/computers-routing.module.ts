import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { AboutcomputersComponent } from './aboutcomputers/aboutcomputers.component';
import { HomecomputersComponent } from './homecomputers/homecomputers.component';

const routes: Routes = [
  {path:"",component:HomecomputersComponent},
  {path:"item/:id/:describ/:price/:user_item_id",component:AboutcomputersComponent}
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule]
})
export class ComputersRoutingModule { }
