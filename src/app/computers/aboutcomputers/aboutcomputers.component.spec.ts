import { ComponentFixture, TestBed } from '@angular/core/testing';

import { AboutcomputersComponent } from './aboutcomputers.component';

describe('AboutcomputersComponent', () => {
  let component: AboutcomputersComponent;
  let fixture: ComponentFixture<AboutcomputersComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ AboutcomputersComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(AboutcomputersComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
