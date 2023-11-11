import { Component, OnInit, ViewChild, ChangeDetectorRef } from '@angular/core';
import { Observable } from 'rxjs';
import { MatTableDataSource } from '@angular/material/table';
import { MatPaginator } from '@angular/material/paginator';
import { VoyageService } from '../voyage.service';
import { Voyage } from '../voyage.model';
import { MatSort } from '@angular/material/sort';
import { UserService } from '../user.service';
import { MatDialog } from '@angular/material/dialog';

@Component({
  selector: 'app-store',
  templateUrl: './store.component.html',
  styleUrls: ['./store.component.css']
})


export class StoreComponent implements OnInit {

  @ViewChild(MatSort) sort!: MatSort
  @ViewChild(MatPaginator) paginator!: MatPaginator;
  observable!: Observable<any>;
  dataSource = new MatTableDataSource<Voyage>();
  cardOpened: boolean = false



  constructor(private changeDetectorRef: ChangeDetectorRef, private voyageService: VoyageService, public userService: UserService, private dialog: MatDialog) {
  }

  ngOnInit() {
    this.userService.isLoggedIn()
    this.dataSource.data = this.getVoyages()
    this.changeDetectorRef.detectChanges();
    this.dataSource.paginator = this.paginator;
    this.dataSource.sort = this.sort
    this.observable = this.dataSource.connect();
  }

  ngOnDestroy() {
    if (this.dataSource) { 
      this.dataSource.disconnect(); 
    }
  }

  doFilter(filterValue: string): void {
    
  }

  doFav(){
    let fav = this.userService.currentUserSession!.favorites
    this.dataSource.filter = fav!.trim().toLowerCase() 
  }

  doSearch(filterValue: string) {
    this.dataSource.filter = filterValue.trim().toLowerCase()
  }

  getVoyages(): any {
    let voyageArray = [ ]
    for (var i = 0; i < this.voyageService.dummyVoyageList.length; i++){
      voyageArray.push(this.voyageService.dummyVoyageList[i])
    }
    return voyageArray
  }

  reserveVoyage(id: number) {
    this.voyageService.dummyVoyageList[id - 1].reservedUsers?.push(this.userService.currentUserSession!.id)
    alert("Rezervisano!")
    this.ngOnInit()
  }

}
