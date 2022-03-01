import { ComponentFixture, TestBed } from '@angular/core/testing';

import { AboutcarsComponent } from './aboutcars.component';

describe('AboutcarsComponent', () => {
  let component: AboutcarsComponent;
  let fixture: ComponentFixture<AboutcarsComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ AboutcarsComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(AboutcarsComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
