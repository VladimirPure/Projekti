import { Component, OnInit } from '@angular/core';
import { FormControl, NgForm } from '@angular/forms';
import { UserService } from 'src/app/user.service';

@Component({
  selector: 'app-data',
  templateUrl: './profile.component.html',
  styleUrls: ['./profile.component.css']
})
export class ProfileComponent implements OnInit {

  constructor(public userService: UserService) { }
  isEditing: boolean = false
  favs = new FormControl('')
  favsOptions: string[] = ['Voz', 'Avion', 'Autobus']

  ngOnInit(): void {
    this.userService.isLoggedIn()
  }

  isChecked(): boolean{
    return true
  }

  finishEditing(form: NgForm) {
    this.isEditing = false;
  }

}
