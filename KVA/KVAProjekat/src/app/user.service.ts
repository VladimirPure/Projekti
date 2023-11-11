import { Injectable } from "@angular/core";
import { Router } from "@angular/router";
import { User } from "./user.model";

@Injectable()
export class UserService {

    public currentUserSession: User | undefined

    constructor(private router: Router){}

    static dummyUserList: Array<User> = [
        {
            id: 1,
            firstname: "Marko",
            lastname: "Markovic",
            email: "marko@marko.com",
            address: "Markoviceva 12",
            password: "123456",
            favorites: "Autobus",
            date: new Date("2022-01-1 09:00"),
        },
        
        {
            id: 2,
            firstname: "Pera",
            lastname: "Perovic",
            email: "pera@pera.com",
            address: "Perina 15",
            password: "123456",
            favorites: "Voz",
            date: new Date(),
        }
    ]


    getUserName(user: User) : string {
        return user.email
    }

    getCurrentUser(): User | undefined {
        return this.currentUserSession
    }

    getUserById(id: number) : User {
        var foundUser!: User
        UserService.dummyUserList.forEach(user => {
            if (user.id == id) {
                foundUser = user
            }

        })
        return foundUser
    }

    getUser(userEmail: string) : User {
        this.currentUserSession = UserService.dummyUserList.find(userToFind => userToFind.email == userEmail)!
        return this.currentUserSession
    }

    isPasswordCorrect(userEmail: string, password: string) : boolean {
        return UserService.dummyUserList.find(userToFind => (userToFind.email == userEmail && userToFind.password == password)) != undefined
    }

    registerUser(email: string, firstname: string, lastname:string, address:string, password: string, date: Date, favorites: string) : User {
        var maxId: number = 0

        UserService.dummyUserList.forEach(user =>

            {
                if (maxId < user.id) {
                    maxId = user.id
                }
            })

            var id = ++maxId
            var user: User = {
                id,
                firstname, 
                lastname, 
                email, 
                address, 
                password, 
                date, 
                favorites
                }
            UserService.dummyUserList.push(user)
            this.currentUserSession = user
            return user
    }

    isLoggedIn() {
        if (this.currentUserSession === undefined) {
            this.router.navigate(["login"])
        }
    }


}