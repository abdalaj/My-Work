import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { AboutfoodsComponent } from './aboutfoods/aboutfoods.component';
import { HomefoodsComponent } from './homefoods/homefoods.component';

const routes: Routes = [
  {path:"",component:HomefoodsComponent},
  {path:"item/:id/:describ/:price/:user_item_id",component:AboutfoodsComponent}
]

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule]
})
export class FoodsRoutingModule { }
