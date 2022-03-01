import { Ng2SearchPipeModule } from 'ng2-search-filter';
import { FormsModule } from '@angular/forms';
import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

import { BeautyRoutingModule } from './beauty-routing.module';
import { HomebeautyComponent } from './homebeauty/homebeauty.component';
import { AboutbeautyComponent } from './aboutbeauty/aboutbeauty.component';
import {  HttpClientModule } from '@angular/common/http';
import { NgxSkeletonLoaderModule } from 'ngx-skeleton-loader';
import { NgxPaginationModule } from 'ngx-pagination';


@NgModule({
  declarations: [
    HomebeautyComponent,
    AboutbeautyComponent
  ],
  imports: [
    CommonModule,
    BeautyRoutingModule,
    HttpClientModule,
    FormsModule,
    NgxSkeletonLoaderModule,
    NgxPaginationModule,
    Ng2SearchPipeModule
  ]
})
export class BeautyModule { }
