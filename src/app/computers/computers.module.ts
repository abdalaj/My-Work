import { Ng2SearchPipeModule } from 'ng2-search-filter';
import { FormsModule } from '@angular/forms';
import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

import { ComputersRoutingModule } from './computers-routing.module';
import { HomecomputersComponent } from './homecomputers/homecomputers.component';
import { AboutcomputersComponent } from './aboutcomputers/aboutcomputers.component';
import { HttpClientModule } from '@angular/common/http';
import { NgxPaginationModule } from 'ngx-pagination';
import { NgxSkeletonLoaderModule } from 'ngx-skeleton-loader';


@NgModule({
  declarations: [
    HomecomputersComponent,
    AboutcomputersComponent
  ],
  imports: [
    CommonModule,
    ComputersRoutingModule,
    HttpClientModule,
    FormsModule,
    NgxPaginationModule,
    NgxSkeletonLoaderModule,
    Ng2SearchPipeModule
  ]
})
export class ComputersModule { }
