import { Ng2SearchPipeModule } from 'ng2-search-filter';
import { NgxPaginationModule } from 'ngx-pagination';
import { FormsModule } from '@angular/forms';
import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

import { ToysRoutingModule } from './toys-routing.module';
import { HometoysComponent } from './hometoys/hometoys.component';
import { AbouttoysComponent } from './abouttoys/abouttoys.component';
import { HttpClientModule } from '@angular/common/http';
import { NgxSkeletonLoaderModule } from 'ngx-skeleton-loader';

@NgModule({
  declarations: [
    HometoysComponent,
    AbouttoysComponent,
  ],
  imports: [
    CommonModule,
    ToysRoutingModule,
    HttpClientModule,
    FormsModule,
    NgxPaginationModule,
    NgxSkeletonLoaderModule,
    Ng2SearchPipeModule
  ]
})
export class ToysModule { }
