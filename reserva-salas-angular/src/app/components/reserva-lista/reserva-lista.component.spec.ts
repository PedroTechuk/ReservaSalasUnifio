import { ComponentFixture, TestBed } from '@angular/core/testing';

import { ReservaListaComponent } from './reserva-lista.component';

describe('ReservaListaComponent', () => {
  let component: ReservaListaComponent;
  let fixture: ComponentFixture<ReservaListaComponent>;

  beforeEach(() => {
    TestBed.configureTestingModule({
      declarations: [ReservaListaComponent]
    });
    fixture = TestBed.createComponent(ReservaListaComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
