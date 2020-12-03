import { Component, OnInit } from '@angular/core';
import { Store } from "@ngxs/store";
import { Observable } from "rxjs";
import { Produit } from "../models/produit";
import { ProductState } from "../../shared/states/product-state";

@Component({
  selector: 'app-header',
  templateUrl: './header.component.html',
  styleUrls: ['./header.component.css']
})
export class HeaderComponent implements OnInit {

  nbProducts$: Observable<number>;

  constructor(private store: Store) { }

  ngOnInit(): void {
    this.nbProducts$ = this.store.select(ProductState.getNbProducts);
  }

}
