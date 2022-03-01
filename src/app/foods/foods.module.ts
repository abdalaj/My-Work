import { Ng2SearchPipeModule } from 'ng2-search-filter';
import { FormsModule } from '@angular/forms';
import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

import { FoodsRoutingModule } from './foods-routing.module';
import { HomefoodsComponent } from './homefoods/homefoods.component';
import { AboutfoodsComponent } from './aboutfoods/aboutfoods.component';
import { HttpClientModule } from '@angular/common/http';
import { NgxPaginationModule } from 'ngx-pagination';
import { NgxSkeletonLoaderModule } from 'ngx-skeleton-loader';


@NgModule({
  declarations: [
    HomefoodsComponent,
    AboutfoodsComponent
  ],
  imports: [
    CommonModule,
    FoodsRoutingModule,
    HttpClientModule,
    FormsModule,
    NgxPaginationModule,
    NgxSkeletonLoaderModule,
    Ng2SearchPipeModule
  ]
})
export class FoodsModule { }
