/*************************************************************************
 * Copyright (c) Metabiota Incorporated - All Rights Reserved
 * ------------------------------------------------------------------------
 * This material is proprietary to Metabiota Incorporated. The
 * intellectual and technical concepts contained herein are proprietary
 * to Metabiota Incorporated. Reproduction or distribution of this
 * material, in whole or in part, is strictly forbidden unless prior
 * written permission is obtained from Metabiota Incorporated.
 * ***********************************************************************
 * <p/>
 * Created by WLao on 11/11/15.
 */
package com.recipe.rest.entity;

import lombok.*;

import javax.persistence.*;
import javax.validation.constraints.NotNull;
import java.util.Date;

@Entity
@Table(name = "recipe", catalog = "npudb")
@NoArgsConstructor
@AllArgsConstructor
@ToString
public class RecipeDO {
    @Column(name = "id", unique = true, nullable = false)
    @Id
    @GeneratedValue(strategy = GenerationType.AUTO)
    @Getter
    @Setter
    private Integer id;

    @Column(name = "title", nullable = false, length = 100)
    @NotNull
    @Getter
    @Setter
    private String title;

    @Column(name = "description", nullable = false, length = 255)
    @NotNull
    @Getter
    @Setter
    private String description;

    @Column(name = "difficulty", nullable = true)
    @Getter
    @Setter
    private Integer difficulty;

    @Column(name = "serving_amount", nullable = true)
    @Getter
    @Setter
    private Integer servingAmount;

    @Column(name = "cooking_time", nullable = true)
    @Getter
    @Setter
    private Integer cookingTime;

    @Column(name = "ingredient", nullable = true, length = 1000)
    @Getter
    @Setter
    private String ingredient;

    @Column(name = "direction", nullable = true, length = 5000)
    @Getter
    @Setter
    private String direction;

    @Column(name = "nutrition_fact", nullable = true, length = 1000)
    @Getter
    @Setter
    private String nutritionFact;

    @Column(name = "image_url", nullable = true, length = 255)
    @Getter
    @Setter
    private String imageUrl;

    @Column(name = "user_id", nullable = false)
    @NotNull
    @Getter
    @Setter
    private Integer userId;

    @Column(name = "category", nullable = true, length = 100)
    @Getter
    @Setter
    private String category;

    @Column(name = "created_by", nullable = false, length = 100)
    @NotNull
    @Getter
    @Setter
    private String createdBy;

    @Column(name = "created_date", nullable = false, updatable=false)
    @Getter
    @Setter
    private Date createdDate;

    @Column(name = "updated_by", nullable = false, length = 100)
    @NotNull
    @Getter
    @Setter
    private String updatedBy;

    @Column(name = "updated_date", nullable = false)
    @Getter
    @Setter
    private Date updatedDate;

    @PrePersist
    protected void onCreate() {
        this.createdBy = "admin";
        this.updatedBy = "admin";
        this.createdDate = new Date();
        this.updatedDate = new Date();
    }

    @PreUpdate
    protected void onUpdate(){
        this.updatedBy = "admin";
        this.updatedDate = new Date();
    }
}
