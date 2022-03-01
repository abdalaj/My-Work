import { ComponentFixture, TestBed } from '@angular/core/testing';

import { HomeclothesComponent } from './homeclothes.component';

describe('HomeclothesComponent', () => {
  let component: HomeclothesComponent;
  let fixture: ComponentFixture<HomeclothesComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ HomeclothesComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(HomeclothesComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
