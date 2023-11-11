import { ComponentFixture, TestBed } from '@angular/core/testing';

import { ProfileComponent } from './profile.component';

describe('DataComponent', () => {
  let profile: ProfileComponent;
  let fixture: ComponentFixture<ProfileComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ ProfileComponent ]
    })
    .compileComponents();

    fixture = TestBed.createComponent(ProfileComponent);
    profile = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(profile).toBeTruthy();
  });
});
