import { Ng2SearchPipeModule } from 'ng2-search-filter';
import { NgxPaginationModule } from 'ngx-pagination';
import { NgxSkeletonLoaderModule } from 'ngx-skeleton-loader';
import { FormsModule } from '@angular/forms';
import { HttpClientModule } from '@angular/common/http';
import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

import { CarsRoutingModule } from './cars-routing.module';
import { AboutcarsComponent } from './aboutcars/aboutcars.component';
import { HomecarsComponent } from './homecars/homecars.component';


@NgModule({
  declarations: [
    AboutcarsComponent,
    HomecarsComponent
  ],
  imports: [
    CommonModule,
    CarsRoutingModule,
    HttpClientModule,
    FormsModule,
    NgxSkeletonLoaderModule,
    NgxPaginationModule,
    Ng2SearchPipeModule
  ]
})
export class CarsModule { }
