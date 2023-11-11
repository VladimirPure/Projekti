import { AfterViewInit, Component, OnInit, ViewChild } from '@angular/core';
import { VoyageService } from '../voyage.service';
import { Voyage } from '../voyage.model';
import { MatTableDataSource } from '@angular/material/table';
import { MatPaginator } from '@angular/material/paginator';
import { MatSort } from '@angular/material/sort';
import { UserService } from '../user.service';

@Component({
  selector: 'app-cart',
  templateUrl: './cart.component.html',
  styleUrls: ['./cart.component.css']
})
export class CartComponent implements OnInit, AfterViewInit {
  currentUserId = this.userService.currentUserSession?.id
  displayedColumns = ['name', 'type', 'date', 'likes', 'price', 'status', 'actions']
  status = ''
  travelSource = new MatTableDataSource<Voyage>()
  @ViewChild(MatPaginator) paginator!: MatPaginator
  @ViewChild(MatSort) sort!: MatSort
  constructor( private voyageService: VoyageService, private userService: UserService) { }

  ngOnInit(): void {
    this.userService.isLoggedIn()
    this.travelSource.data = this.voyageService.getVoyages()
    this.travelSource.data = this.getReservedVoyages()
  }

  ngAfterViewInit(): void {
    this.travelSource.sort = this.sort
    this.travelSource.paginator = this.paginator
  }

  doFilter(filterValue: string) {
    this.travelSource.filter = filterValue.trim().toLowerCase()
  }

  getTotalCost() {
    return this.travelSource.data.map(t => t.price).reduce((x, val) => x + val, 0)
  }

  getCurrentUserReservations() {
    this.travelSource.data = this.getReservedVoyages()
  }

  getReservedVoyages(): any {
    let reservedVoyagesArr = []
    for (var i = 0; i < this.voyageService.dummyVoyageList.length; i++){
      if (this.voyageService.dummyVoyageList[i].reservedUsers?.includes(this.currentUserId!)){
        reservedVoyagesArr.push(this.voyageService.dummyVoyageList[i])
      }
    }
    return reservedVoyagesArr
  }

  deleteTrip(id: number){
    var index = this.voyageService.dummyVoyageList[id - 1].reservedUsers?.indexOf(this.currentUserId!)
    this.voyageService.dummyVoyageList[id - 1].reservedUsers!.splice(index!)
    this.ngOnInit()
  }

  isDisabledDelete() {
    if (this.status === 'Uskoro' || this.status === 'Cancelled') {
      return true
    } else {
      return false
    }
  }

  isDisabledCancel() {
    if (this.status === 'Uskoro') {
      return false
    } else {
      return true
    }
  }

  getStatus(travel: Voyage){
    if (travel.cancelledUsers?.find(id => id === this.currentUserId)) {
      this.status = 'Cancelled'
      return 'Cancelled'
    }
    if (travel.status === 'Gotovo') {
      this.status = 'Gotovo'
      return 'Gotovo'
    }
    this.status = 'Uskoro'
    return 'Uskoro'
  }
  
  cancelTrip(id: number) {
    this.voyageService.dummyVoyageList[id - 1].cancelledUsers?.push(this.userService.currentUserSession!.id)
    this.ngOnInit()
  }
}
