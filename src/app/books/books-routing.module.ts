import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { AboutbooksComponent } from './aboutbooks/aboutbooks.component';
import { HomebooksComponent } from './homebooks/homebooks.component';

const routes: Routes = [
  {path:"",component:HomebooksComponent},
  {path:"item/:id/:describ/:price/:user_item_id",component:AboutbooksComponent},
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule]
})
export class BooksRoutingModule { }
