import { ComponentFixture, TestBed } from '@angular/core/testing';

import { HomeaccessoriesComponent } from './homeaccessories.component';

describe('HomeaccessoriesComponent', () => {
  let component: HomeaccessoriesComponent;
  let fixture: ComponentFixture<HomeaccessoriesComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ HomeaccessoriesComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(HomeaccessoriesComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
