import { Injectable } from "@angular/core";
import { Voyage } from "./voyage.model";
import { UserService } from "./user.service";

@Injectable()
export class VoyageService {
    constructor(public userService: UserService){}
    public dummyVoyageList: Array<Voyage> = [

        {
        id: 1,
        type: 'Voz',
        img: "https://images.alphacoders.com/806/thumb-1920-806121.jpg",
        name: 'Prag',
        price: 300,
        date: new Date(),
        likes: 20,
        status: 'Uskoro',
        description: 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.',
        comments: [
            { userId: 1, userName: "Marko", comment: 'Super'}, 
        ],
        cancelledUsers: [ 2 ],
        reservedUsers: [ 1 ]    
        },

        {
        id: 2,
        type: 'Avion',
        img: "https://images.unsplash.com/photo-1620283110809-3ff3adfe057b?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MXx8YnJhdGlzbGF2YXxlbnwwfHwwfHw%3D&w=1000&q=80",
        name: 'Bratislava',
        price: 200,
        date: new Date(),
        likes: 15,
        status: 'Uskoro',
        comments: [
            { userId: 1, userName: "Marko", comment: 'Kul'},
            { userId: 2, userName: "Pera", comment: 'Festa'}       
        ],
        description: 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.',
        cancelledUsers: [ 1 ],
        reservedUsers: [ 2 ]    
        },

        {
        id: 3,
        type: 'Voz',
        img: "https://media.istockphoto.com/photos/frankfurt-am-main-iron-steg-and-skyline-germany-picture-id1130726380?k=20&m=1130726380&s=612x612&w=0&h=IjqIABQkETsUHcwJYjOuBeUyGPJRpUtpVPMnkX1yyEA=",
        name: 'Frankfurt',
        price: 500,
        date: new Date(),
        likes: 5,
        status: 'Uskoro',
        likeUsers: [ ],
        comments: [
            { userId: 2, userName: "Pera", comment: 'Uzasno'} 
        ],
        description: 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.',
        cancelledUsers: [ ],
        reservedUsers: [ ]
        },

        {
        id: 4,
        type: 'Avion',
        img: "https://free4kwallpapers.com/uploads/originals/2016/02/09/munich-skyline-wallpaper.jpg",
        name: 'Minhen',
        price: 400,
        date: new Date(),
        likes: 40,
        status: 'Gotovo',
        likeUsers: [ ],
        comments: [
            { userId: 2, userName: "Pera", comment: 'Uzasno'} 
        ],
        description: 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.',
        cancelledUsers: [ ],
        reservedUsers: [ ]
        },

        {
        id: 5,
        type: 'Autobus',
        img: "https://wallpaperaccess.com/full/3824901.jpg",
        name: 'Oslo',
        price: 1000,
        date: new Date(),
        likes: 25,
        status: 'Uskoro',
        likeUsers: [ ],
        comments: [
            { userId: 2, userName: "Pera", comment: 'Uzasno'} 
        ],
        description: 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.',
        cancelledUsers: [ ],
        reservedUsers: [ ]
        },

        {
        id: 6,
        type: 'Avion',
        img: "https://images.unsplash.com/photo-1539037116277-4db20889f2d4?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MXx8bWFkcmlkfGVufDB8fDB8fA%3D%3D&w=1000&q=80",
        name: 'Madrid',
        price: 450,
        date: new Date(),
        likes: 35,
        status: 'Uskoro',
        likeUsers: [ ],
        comments: [
            { userId: 2, userName: "Pera", comment: 'Uzasno'} 
        ],
        description: 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.',
        cancelledUsers: [ ],
        reservedUsers: [ ]
        },

        {
        id: 7,
        type: 'Autobus',
        img: "https://c4.wallpaperflare.com/wallpaper/786/863/822/chain-bridge-budapest-hungary-europe-wallpaper-preview.jpg",
        name: 'Budimpesta',
        price: 250,
        date: new Date(),
        likes: 25,
        status: 'Uskoro',
        likeUsers: [ ],
        comments: [
            { userId: 2, userName: "Pera", comment: 'Uzasno'} 
        ],
        description: 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.',
        cancelledUsers: [ ],
        reservedUsers: [ ]
        },

        {
        id: 8,
        type: 'Voz',
        img: "https://expatra.com/wp-content/uploads/2021/07/Alexander_Nevsky_Cathedral_Sofia_Bulgaria.jpg",
        name: 'Sofija',
        price: 150,
        date: new Date(),
        likes: 10,
        status: 'Uskoro',
        likeUsers: [ ],
        comments: [
            { userId: 2, userName: "Pera", comment: 'Uzasno'} 
        ],
        description: 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.',
        cancelledUsers: [ ],
        reservedUsers: [ ]
        },

        {
        id: 9,
        type: 'Autobus',
        img: "https://www.vrsaconline.com/wp-content/uploads/2019/01/BezSlike-01-600x330.jpg",
        name: 'Vrsac',
        price: 200,
        date: new Date(),
        likes: 25,
        status: 'Uskoro',
        likeUsers: [ ],
        comments: [
            { userId: 2, userName: "Pera", comment: 'Uzasno'} 
        ],
        description: 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.',
        cancelledUsers: [ ],
        reservedUsers: [ ]
        },
        
        {
        id: 10,
        type: 'Avion',
        img: "https://media.istockphoto.com/photos/belgrade-serbia-serbia-balkans-eastern-europe-europe-picture-id1217412568?b=1&k=20&m=1217412568&s=170667a&w=0&h=k4BJK9fT-ZUq-H4qhA2SJIBYynV7D-KtcjyeWkQD0BE=",
        name: 'Beograd',
        price: 800,
        date: new Date(),
        likes: 200,
        status: 'Uskoro',
        likeUsers: [ ],
        comments: [
            { userId: 2, userName: "Pera", comment: 'Uzasno'} 
        ],
        description: 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.',
        cancelledUsers: [ ],
        reservedUsers: [ ]
        }
    ]

    getVoyages(){
        return this.dummyVoyageList
    }

    getVoyageById(id: number) {
        var findVoyage!: Voyage
        this.dummyVoyageList.forEach(voyage =>{
            if (voyage.id == id) {
                findVoyage = voyage
            }
        })
        return findVoyage
    }

    removeVoyage(voyageToDelete: Voyage) {
        this.dummyVoyageList = this.dummyVoyageList.filter( voyage =>
            voyage.id != voyageToDelete.id)
    }
    
    createNewVoyage(voyage: Voyage) {
        this.dummyVoyageList.push(voyage)
    }

    leaveComment(id: number, comment: string) {
        this.dummyVoyageList[id-1].comments?.push({userId: this.userService.currentUserSession!.id, comment: comment})
    }


}