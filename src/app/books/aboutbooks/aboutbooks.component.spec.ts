import { ComponentFixture, TestBed } from '@angular/core/testing';

import { AboutbooksComponent } from './aboutbooks.component';

describe('AboutbooksComponent', () => {
  let component: AboutbooksComponent;
  let fixture: ComponentFixture<AboutbooksComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ AboutbooksComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(AboutbooksComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
