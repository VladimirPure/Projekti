import { AppComponent } from "./app.component";
import { SignupComponent } from "./auth/signup/signup.component";
import { LoginComponent } from "./auth/login/login.component";
import { WelcomeComponent } from "./welcome/welcome.component";
import { ProfileComponent } from "./auth/profile/profile.component";
import { StoreComponent } from "./store/store.component";
import { CartComponent } from "./cart/cart.component";

import { NgModule } from "@angular/core";
import { BrowserModule } from "@angular/platform-browser";
import { BrowserAnimationsModule } from "@angular/platform-browser/animations";
import { MaterialModule } from "./material.module";
import { RoutingModule } from "./routing.module";
import { FlexLayoutModule } from "@angular/flex-layout";
import { FormsModule, ReactiveFormsModule } from "@angular/forms";

import { VoyageService } from "./voyage.service";
import { CartService } from "./cart.service";
import { UserService } from "src/app/user.service";

@NgModule({
  declarations: [
    AppComponent,
    SignupComponent,
    LoginComponent,
    WelcomeComponent,
    StoreComponent,
    CartComponent,
    ProfileComponent,
  ],

  imports: [
    BrowserModule,
    MaterialModule,
    RoutingModule,
    BrowserAnimationsModule,
    FlexLayoutModule,
    FormsModule,
    ReactiveFormsModule
  ],

  providers: [ 
    UserService, 
    VoyageService, 
    CartService 
  ],

  bootstrap: [
    AppComponent
  ],

  entryComponents: [

  ]

})
export class AppModule { }
