import { ComponentFixture, TestBed } from '@angular/core/testing';

import { AboutelectronicsComponent } from './aboutelectronics.component';

describe('AboutelectronicsComponent', () => {
  let component: AboutelectronicsComponent;
  let fixture: ComponentFixture<AboutelectronicsComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ AboutelectronicsComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(AboutelectronicsComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
