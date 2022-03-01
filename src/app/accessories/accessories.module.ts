import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

import { AccessoriesRoutingModule } from './accessories-routing.module';
import { HomeaccessoriesComponent } from './homeaccessories/homeaccessories.component';
import { AboutaccessoriesComponent } from './aboutaccessories/aboutaccessories.component';
import {  HttpClientModule } from '@angular/common/http';
import { FormsModule } from '@angular/forms';
import {NgxPaginationModule} from 'ngx-pagination'; // <-- import the module
import { NgxSkeletonLoaderModule } from 'ngx-skeleton-loader';
import { Ng2SearchPipeModule } from 'ng2-search-filter';
@NgModule({
  declarations: [
    HomeaccessoriesComponent,
    AboutaccessoriesComponent,
  ],
  imports: [
    CommonModule,
    AccessoriesRoutingModule,
    HttpClientModule,
    FormsModule,
    NgxPaginationModule,
    NgxSkeletonLoaderModule,
    Ng2SearchPipeModule,
  ]
})
export class AccessoriesModule { }
