import { Component, OnInit } from '@angular/core';
import { NgForm } from '@angular/forms';
import { Router } from '@angular/router';
import { UserService } from 'src/app/user.service';

@Component({
  selector: 'app-signup',
  templateUrl: './signup.component.html',
  styleUrls: ['./signup.component.css']
})
export class SignupComponent implements OnInit {
  
  optionsFav: string[] = ['Autobus', 'Avion', 'Voz']
  errorExists = false
  errorText = ""

  constructor(public userService: UserService, private router: Router) { }

  ngOnInit(): void {
    console.log(this.userService.currentUserSession)
  }

  onSubmit(form : NgForm) {
    if (!this.userService.getUser(form.value.email)){
      this.errorExists = false
      this.userService.registerUser(
        form.value.email,form.value.firstname, form.value.lastname, form.value.address, form.value.password, form.value.birthDate, form.value.favorites
        )
      this.router.navigate([''])
    } else {
      this.errorExists = true
      this.errorText = "User with this email already exists."
    }
  }

}
