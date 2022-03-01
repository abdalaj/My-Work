import { ComponentFixture, TestBed } from '@angular/core/testing';

import { SillComponent } from './sill.component';

describe('SillComponent', () => {
  let component: SillComponent;
  let fixture: ComponentFixture<SillComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ SillComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(SillComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
