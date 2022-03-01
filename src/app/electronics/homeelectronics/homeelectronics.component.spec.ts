import { ComponentFixture, TestBed } from '@angular/core/testing';

import { HomeelectronicsComponent } from './homeelectronics.component';

describe('HomeelectronicsComponent', () => {
  let component: HomeelectronicsComponent;
  let fixture: ComponentFixture<HomeelectronicsComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ HomeelectronicsComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(HomeelectronicsComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
