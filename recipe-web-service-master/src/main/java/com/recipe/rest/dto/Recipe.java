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
package com.recipe.rest.dto;

import com.fasterxml.jackson.annotation.JsonIgnoreProperties;
import com.fasterxml.jackson.annotation.JsonInclude;
import com.fasterxml.jackson.annotation.JsonRootName;
import com.fasterxml.jackson.annotation.JsonView;
import com.recipe.rest.common.View;
import lombok.*;
import org.springframework.stereotype.Component;

import java.util.Date;

@ToString
@Component
@Data
@NoArgsConstructor
@AllArgsConstructor
@JsonInclude(JsonInclude.Include.NON_NULL)
@JsonRootName("recipe")
@JsonIgnoreProperties(ignoreUnknown = true)
public class Recipe {

    @JsonView({View.GetResponse.class, View.PostResponse.class})
    private Integer id;

    @JsonView(View.GetResponse.class)
    private String title;

    @JsonView(View.GetResponse.class)
    private String description;

    @JsonView(View.GetResponse.class)
    private String difficulty;

    @JsonView(View.GetResponse.class)
    private Integer servingAmount;

    @JsonView(View.GetResponse.class)
    private Integer cookingTime;

    @JsonView(View.GetResponse.class)
    private String ingredient;

    @JsonView(View.GetResponse.class)
    private String direction;

    @JsonView(View.GetResponse.class)
    private String nutritionFact;

    @JsonView(View.GetResponse.class)
    private String imageUrl;

    @JsonView(View.GetResponse.class)
    private Integer userId;

    @JsonView(View.GetResponse.class)
    private String category;

    @JsonView(View.GetResponse.class)
    private Long totalVote;

    @JsonView(View.GetResponse.class)
    private String createdBy;

    @JsonView(View.GetResponse.class)
    private Date createdDate;

    @JsonView(View.GetResponse.class)
    private String updatedBy;

    @JsonView(View.GetResponse.class)
    private Date updatedDate;
}
