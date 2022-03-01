import { ComponentFixture, TestBed } from '@angular/core/testing';

import { HomeshoesComponent } from './homeshoes.component';

describe('HomeshoesComponent', () => {
  let component: HomeshoesComponent;
  let fixture: ComponentFixture<HomeshoesComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ HomeshoesComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(HomeshoesComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
