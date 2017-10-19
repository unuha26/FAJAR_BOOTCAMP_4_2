import { Injectable } from '@angular/core';
import { Http, Headers, RequestOptions } from "@angular/http";

@Injectable()
export class DataService {

 add : string;
  constructor() { }

 public CourseList : object[] = [{'name' : 'course 1', 'availability' : true},{'name' : 'course 2', 'availability' : true},{'name' : 'course 3', 'availability' : true}];
AddCourse(){
    this.CourseList.push({
      "name" : this.add,
      "availability" : true
    });
  }
}
