import { ComponentFixture, TestBed } from '@angular/core/testing';

import { HomecomputersComponent } from './homecomputers.component';

describe('HomecomputersComponent', () => {
  let component: HomecomputersComponent;
  let fixture: ComponentFixture<HomecomputersComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ HomecomputersComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(HomecomputersComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
