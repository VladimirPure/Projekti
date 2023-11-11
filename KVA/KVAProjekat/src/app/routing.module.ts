import { NgModule } from "@angular/core";

import { Routes, RouterModule } from "@angular/router";
import { LoginComponent } from "./auth/login/login.component";
import { ProfileComponent } from "./auth/profile/profile.component";
import { SignupComponent } from "./auth/signup/signup.component";
import { CartComponent } from "./cart/cart.component";
import { StoreComponent } from "./store/store.component";
import { WelcomeComponent } from "./welcome/welcome.component";

const rute: Routes = [
    { path: '', component: WelcomeComponent},
    { path: 'login', component: LoginComponent},
    { path: 'signup', component: SignupComponent},
    { path: 'store', component: StoreComponent},
    { path: 'cart', component: CartComponent},
    { path: 'profile', component: ProfileComponent}
    
]

@NgModule({
    imports: [RouterModule.forRoot(rute)],
    exports: [RouterModule]
})

export class RoutingModule {

}