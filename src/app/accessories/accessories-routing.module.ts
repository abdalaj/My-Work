import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { AboutaccessoriesComponent } from './aboutaccessories/aboutaccessories.component';
import { HomeaccessoriesComponent } from './homeaccessories/homeaccessories.component';

const routes: Routes = [
  {path:"",component:HomeaccessoriesComponent},
  {path:"item/:id/:describ/:price/:user_item_id",component:AboutaccessoriesComponent},
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule]
})
export class AccessoriesRoutingModule { }
