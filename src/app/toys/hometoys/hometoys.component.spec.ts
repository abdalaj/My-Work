import { ComponentFixture, TestBed } from '@angular/core/testing';

import { HometoysComponent } from './hometoys.component';

describe('HometoysComponent', () => {
  let component: HometoysComponent;
  let fixture: ComponentFixture<HometoysComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ HometoysComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(HometoysComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
