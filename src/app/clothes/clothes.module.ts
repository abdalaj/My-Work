import { Ng2SearchPipeModule } from 'ng2-search-filter';
import { FormsModule } from '@angular/forms';
import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

import { ClothesRoutingModule } from './clothes-routing.module';
import { AboutclothesComponent } from './aboutclothes/aboutclothes.component';
import { HomeclothesComponent } from './homeclothes/homeclothes.component';
import { HttpClientModule } from '@angular/common/http';
import { NgxSkeletonLoaderModule } from 'ngx-skeleton-loader';
import { NgxPaginationModule } from 'ngx-pagination';



@NgModule({
  declarations: [
    AboutclothesComponent,
    HomeclothesComponent
  ],
  imports: [
    CommonModule,
    ClothesRoutingModule,
    HttpClientModule,
    FormsModule,
    NgxSkeletonLoaderModule,
    NgxPaginationModule,
    Ng2SearchPipeModule
  ]
})
export class ClothesModule { }
