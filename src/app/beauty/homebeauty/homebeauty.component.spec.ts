import { ComponentFixture, TestBed } from '@angular/core/testing';

import { HomebeautyComponent } from './homebeauty.component';

describe('HomebeautyComponent', () => {
  let component: HomebeautyComponent;
  let fixture: ComponentFixture<HomebeautyComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ HomebeautyComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(HomebeautyComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
