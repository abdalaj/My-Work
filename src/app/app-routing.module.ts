import { RecoverComponent } from './recover/recover.component';
import { AboutComponent } from './about/about.component';
import { SillComponent } from './sill/sill.component';
import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { HomeComponent } from './home/home.component';
import { NotfoundComponent } from './notfound/notfound.component';
import { PrivateComponent } from './private/private.component';
import { ContactComponent } from './contact/contact.component';

const routes: Routes = [
  {path:"",component:HomeComponent},
  {path:"about",component:AboutComponent},
  {path:"contact",component:ContactComponent},
  {path:"sill",component:SillComponent},
  {path:"private",component:PrivateComponent},
  {path:"recover",component:RecoverComponent},
  {path:"shoes",loadChildren:()=>import("./shoes/shoes.module").then(m=>m.ShoesModule)},
  {path:"computers",loadChildren:()=>import("./computers/computers.module").then(m=>m.ComputersModule)},
  {path:"clothes",loadChildren:()=>import("./clothes/clothes.module").then(m=>m.ClothesModule)},
  {path:"mobiles",loadChildren:()=>import("./mobiles/mobiles.module").then(m=>m.MobilesModule)},
  {path:"electronics",loadChildren:()=>import("./electronics/electronics.module").then(m=>m.ElectronicsModule)},
  {path:"accessories",loadChildren:()=>import("./accessories/accessories.module").then(m=>m.AccessoriesModule)},
  {path:"beauty",loadChildren:()=>import("./beauty/beauty.module").then(m=>m.BeautyModule)},
  {path:"toys",loadChildren:()=>import("./toys/toys.module").then(m=>m.ToysModule)},
  {path:"foods",loadChildren:()=>import("./foods/foods.module").then(m=>m.FoodsModule)},
  {path:"books",loadChildren:()=>import("./books/books.module").then(m=>m.BooksModule)},
  {path:"car",loadChildren:()=>import("./cars/cars.module").then(m=>m.CarsModule)},
  {path:"**",component:NotfoundComponent}
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
