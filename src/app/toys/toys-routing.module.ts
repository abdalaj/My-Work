import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { AbouttoysComponent } from './abouttoys/abouttoys.component';
import { HometoysComponent } from './hometoys/hometoys.component';

const routes: Routes = [
  {path:"",component:HometoysComponent},
  {path:"item/:id/:describ/:price/:user_item_id",component:AbouttoysComponent},
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule]
})
export class ToysRoutingModule { }
