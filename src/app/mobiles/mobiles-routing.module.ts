import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { AboutmobilesComponent } from './aboutmobiles/aboutmobiles.component';
import { HomemobilesComponent } from './homemobiles/homemobiles.component';

const routes: Routes = [
  {path:"",component:HomemobilesComponent},
  {path:"item/:id/:describ/:price/:user_item_id",component:AboutmobilesComponent}
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule]
})
export class MobilesRoutingModule { }
