import { ComponentFixture, TestBed } from '@angular/core/testing';

import { AbouttoysComponent } from './abouttoys.component';

describe('AbouttoysComponent', () => {
  let component: AbouttoysComponent;
  let fixture: ComponentFixture<AbouttoysComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ AbouttoysComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(AbouttoysComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
