import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { AboutbeautyComponent } from './aboutbeauty/aboutbeauty.component';
import { HomebeautyComponent } from './homebeauty/homebeauty.component';

const routes: Routes = [
  {path:"",component:HomebeautyComponent},
  {path:"item/:id/:describ/:price/:user_item_id",component:AboutbeautyComponent},
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule]
})
export class BeautyRoutingModule { }
