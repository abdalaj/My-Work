import { Ng2SearchPipeModule } from 'ng2-search-filter';
import { FormsModule } from '@angular/forms';
import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

import { ElectronicsRoutingModule } from './electronics-routing.module';
import { HomeelectronicsComponent } from './homeelectronics/homeelectronics.component';
import { AboutelectronicsComponent } from './aboutelectronics/aboutelectronics.component';
import { HttpClientModule } from '@angular/common/http';
import { NgxSkeletonLoaderModule } from 'ngx-skeleton-loader';
import { NgxPaginationModule } from 'ngx-pagination';


@NgModule({
  declarations: [
    HomeelectronicsComponent,
    AboutelectronicsComponent
  ],
  imports: [
    CommonModule,
    ElectronicsRoutingModule,
    HttpClientModule,
    FormsModule,
    NgxSkeletonLoaderModule,
    NgxPaginationModule,
    Ng2SearchPipeModule
  ]
})
export class ElectronicsModule { }
