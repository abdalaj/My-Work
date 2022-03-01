import { FormsModule } from '@angular/forms';
import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { HomeComponent } from './home/home.component';
import { NotfoundComponent } from './notfound/notfound.component';
import { HttpClientModule} from '@angular/common/http';
import { CounterComponent } from './counter/counter.component';
import { NgbModule } from '@ng-bootstrap/ng-bootstrap';
import { AboutComponent } from './about/about.component';
import { ContactComponent } from './contact/contact.component';
import { SillComponent } from './sill/sill.component';
import { PrivateComponent } from './private/private.component';
import { SocialComponent } from './social/social.component';
import { RecoverComponent } from './recover/recover.component';
import { DesktopComponent } from './desktop/desktop.component';
import { SearchComponent } from './search/search.component';

// or with ES6
@NgModule({
  declarations: [
    AppComponent,
    HomeComponent,
    NotfoundComponent,
    CounterComponent,
    AboutComponent,
    ContactComponent,
    SillComponent,
    PrivateComponent,
    SocialComponent,
    RecoverComponent,
    DesktopComponent,
    SearchComponent,
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    HttpClientModule,
    FormsModule,
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
